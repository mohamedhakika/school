<template>
<div class="row">
    <div class="col-md-6 d-flex align-items-center">
    <p>
        <strong>
            Showing {{pagination.from}} - to {{pagination.to}} of {{filtered.length}} entries
            <span v-if="filtered.length < pagination.total">(filtered from {{pagination.total}} total)</span>
        </strong>
    </p>
    </div>
    <div class="col-md-6">
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <li class="page-item">
        <a v-if="pagination.prevPage" class="page-link text-primary" @click="$emit('prev');">
            <span v-html="prevIcon"></span> Prev
        </a>
        <a class="page-link" v-else :disabled="true">
            Prev
        </a>
      </li>
      <li v-for="page in pages" :key="page" :class="page == pagination.currentPage ? 'page-item active': 'page-item'">
        <a class="page-link" @click="changePage(page)">
            {{ page }}
        </a>
      </li>
      <li class="page-item">
        <a v-if="pagination.nextPage" class="page-link text-primary" @click="$emit('next');">
            Next <span v-html="nextIcon"></span>
        </a>
        <a class="page-link" v-else :disabled="true">
            Next
        </a>
      </li>
    </ul>
  </nav>
    </div>
</div>
</template>

<script>
    export default {
        props: ['pagination', 'filtered', 'offset'],

        data () {
            return {
                nextIcon: '<i class="fas fa-angle-double-right"></i>',
                prevIcon: '<i class="fas fa-angle-double-left"></i>'
            }
        },

        computed: {
            pages() {
                if (!this.pagination.to) {
                    return [];
                }
                let from = this.pagination.currentPage - this.offset;
                if (from < 1) {
                    from = 1;
                }
                let to = from + (this.offset * 2);
                if (to >= this.pagination.totalPage) {
                    to = this.pagination.totalPage;
                }
                let pagesArray = [];
                for (let page = from; page <= to; page++) {
                    pagesArray.push(page);
                }
                return pagesArray;
            }
        },
        methods : {
            changePage(page) {
                this.pagination.currentPage = page;
            }
        }
    }
</script>