<template>
  <div class="row">
      <div class="col-md-6">
        <h4 class="text-muted">Already added results</h4>
        <hr>
        <table class="table table-striped table-sm">
          <thead class="bg-secondary">
            <tr>
              <th>No.</th>
              <th>Student Name</th>
              <th>Marks</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(student, index) in filstudents" :key="student.id">
              <td> {{ index+1 }} </td>
              <td> {{ student.name }} </td>
              <td> Marks (%) </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <div class="col">
        <div class="form-group row">
            <div class="col-sm-6 d-flex align-items-center justify-content-end"><b>Show</b></div>
            <div class="col-sm-4">
                <select class="form-control" id="leng" v-model="length" @change="getStudents()">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="-2">All</option>
                </select>
            </div>
            <div class="col-sm-2 d-flex align-items-center justify-content-start"><b>students</b></div>
        </div>
      </div>
        <form @submit="checkForm" method="POST" action="/result/store">
          <input type="hidden" name="_token" :value="csrf">
          <table class="table table-striped table-sm">
            <thead class="bg-secondary">
              <tr>
                <th>No.</th>
                <th>Student Name</th>
                <th>Marks field</th>
                <th>Remove</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(student, index) in filstudents" :key="student.id">
                <td> {{ index+1 }} </td>
                <td> {{ student.name }} </td>
                <td>
                  <input type="hidden" name="student_id[]" :value="student.id">
                  <input type="text" name="marks[]" class="form-control form-control-sm" id="marks" placeholder="Enter marks" required> 
                </td>
                <td> <a href="#" class="badge badge-danger" @click="removeStudent(index)"> X </a> </td>
              </tr>
            </tbody>
          </table>
          <hr>
          <div class="btn-toolbar mb-2 mb-md-0">
              <button v-show="filstudents.length > 0" type="submit" class="btn btn-primary mt-3">
                  Submit result
              </button>
          </div>
        </form>
      </div>
  </div>
</template>

<script>
  export default {
      props: ['students'],
      created() {
        this.getStudents();
      },
      data () {
        return {
            filstudents: [],
            length: 5,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
      },

      methods: {
        getStudents(url = '/api/results') {
          var para = { length: this.length};
          axios.get(url, {params: para})
              .then(response => {
                  this.filstudents = response.data;
              })
              .catch(errors => {
                  console.log(errors);
              });
        },
        removeStudent(index) {
          this.filstudents.splice(index, 1);
        },
        checkForm:function(e) {
          e.preventDefault();
        }
      }
  }
</script>