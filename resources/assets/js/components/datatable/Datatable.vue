<template>
<div class="row">
    <div class="col-md-9">
    <p>
        <strong>
            Showing {{pagination.from}} - to {{pagination.to}} of {{filtered.length}} entries
            <span v-if="filtered.length < pagination.total">(filtered from {{pagination.total}} total)</span>
        </strong>
    </p>
    </div>
    <div class="col-md-3">
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
        props: ['pagination', 'filtered'],

        data () {
            return {
                nextIcon: '<i class="fas fa-angle-double-right"></i>',
                prevIcon: '<i class="fas fa-angle-double-left"></i>'
            }
        }
    }
</script>