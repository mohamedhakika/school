<template>
  <div>
  <div v-if="cloading" class="d-flex justify-content-center h-100">
      <i class="fas fa-spinner fa-pulse fa-5x" style="color:#a8a8a8;"></i>
  </div>
  <div v-if="!cloading">
    <div class="form-row">
      <div class="col">
        <input class="form-control" type="text" v-model="search" placeholder="Search user..."
              @input="resetPagination()">
      </div>

      <div class="col">
        <div class="form-group row">
            <div class="col-sm-6 d-flex align-items-center justify-content-end">Show</div>
            <div class="col-sm-4">
                <select class="form-control" id="leng" v-model="length" @change="resetPagination()">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option :value="pagination.total">All</option>
                </select>
            </div>
            <div class="col-sm-2 d-flex align-items-center justify-content-start">entries</div>
        </div>
      </div>
    </div>
    <datatable :columns="columns" :sortKey="sortKey" :sortOrders="sortOrders" @sort="sortBy">
      <tbody>
        <tr v-for="(user, number) in paginated" :key="user.id">
          <td>{{ number + pagination.from}}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>{{ user.created_at }}</td>
          <td class="text-right align-right">
                <form action="" method="POST">
                    <div class="btn-group">
                      <a href="/users/index" class="btn btn-sm btn-outline-secondary">
                        Show
                      </a>

                      <a href="/users/index" class="btn btn-sm btn-outline-secondary">
                        Edit
                      </a>

                      <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </div>
                </form>
              </td>
        </tr>
      </tbody>
    </datatable>
    <pagination :pagination="pagination" :filtered="filteredUsers" :offset="offset"
                @prev="--pagination.currentPage"
                @next="++pagination.currentPage">
    </pagination>
  </div>
  </div>
</template>

<script>
import Datatable from './Datatable.vue';
import Pagination from './Pagination.vue'
export default {
    components: { datatable: Datatable, pagination: Pagination },
    created() {
        this.getUsers();
    },
    data() {
        let sortOrders = {};
        let columns = [
            {label: 'Name', name: 'name' },
            {label: 'Email', name: 'email'},
            {label: 'Created', name: 'created_at', type: 'date'}
        ];
        columns.forEach((column) => {
           sortOrders[column.name] = 1;
        });
        return {
            users: [],
            columns: columns,
            loading: true,
            sortKey: 'name',
            sortOrders: sortOrders,
            length: 10,
            search: '',
            offset: 3,
            pagination: {
                currentPage: 1,
                total: '',
                totalPage: '',
                nextPage: '',
                prevPage: '',
                from: '',
                to: ''
            },
        }
    },
    methods: {
        getUsers(url = '/users') {
            axios.get(url)
                .then(response => {
                    this.users = response.data;
                    this.pagination.total = this.users.length;
                    this.loading = false;
                })
                .catch(errors => {
                    console.log(errors);
                });
        },
        paginate(array, length, pageNumber) {
            this.pagination.from = array.length ? ((pageNumber - 1) * length) + 1 : ' ';
            this.pagination.to = pageNumber * length > array.length ? array.length : pageNumber * length;
            this.pagination.prevPage = pageNumber > 1 ? pageNumber : '';
            this.pagination.nextPage = array.length > this.pagination.to ? pageNumber + 1 : '';
            this.pagination.totalPage = array.length && (array.length > length) ? Math.ceil(array.length / length) : 1;
            return array.slice((pageNumber - 1) * length, pageNumber * length);
        },
        resetPagination() {
            this.pagination.currentPage = 1;
            this.pagination.prevPage = '';
            this.pagination.totalPage= '';
            this.pagination.nextPage = '';
        },
        sortBy(key) {
            this.resetPagination();
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        getIndex(array, key, value) {
            return array.findIndex(i => i[key] == value)
        },
    },
    computed: {
        filteredUsers() {
            let users = this.users;
            if (this.search) {
                users = users.filter((row) => {
                    return Object.keys(row).some((key) => {
                        return String(row[key]).toLowerCase().indexOf(this.search.toLowerCase()) > -1;
                    })
                });
            }
            let sortKey = this.sortKey;
            let order = this.sortOrders[sortKey] || 1;
            if (sortKey) {
                users = users.slice().sort((a, b) => {
                    let index = this.getIndex(this.columns, 'name', sortKey);
                    a = String(a[sortKey]).toLowerCase();
                    b = String(b[sortKey]).toLowerCase();
                    if (this.columns[index].type && this.columns[index].type === 'date') {
                        return (a === b ? 0 : new Date(a).getTime() > new Date(b).getTime() ? 1 : -1) * order;
                    } else if (this.columns[index].type && this.columns[index].type === 'number') {
                        return (+a === +b ? 0 : +a > +b ? 1 : -1) * order;
                    } else {
                        return (a === b ? 0 : a > b ? 1 : -1) * order;
                    }
                });
            }
            return users;
        },
        paginated() {
            return this.paginate(this.filteredUsers, this.length, this.pagination.currentPage);
        },
        cloading() {
            return this.loading;
        }
    }
};
</script>