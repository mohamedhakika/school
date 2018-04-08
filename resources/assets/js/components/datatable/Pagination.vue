<template>
  <nav aria-label="Page navigation">
    <span class="page-stats">
        {{pagination.from}} - {{pagination.to}} of {{filtered.length}}
        <span v-if="filtered.length < pagination.total">(filtered from {{pagination.total}} total entries)</span>
    </span>
    <ul class="pagination">
      <li class="page-item">
        <a v-if="pagination.prevPage" class="page-link" @click="$emit('prev');">
            Prev
        </a>
        <a class="page-link" v-else :disabled="true">
            Prev
        </a>
      </li>
      <li class="page-item">
        <a v-if="pagination.nextPage" class="page-link" @click="$emit('next');">
            Next
        </a>
        <a class="page-link" v-else :disabled="true">
            Next
        </a>
      </li>
    </ul>
  </nav>
</template>

<script>
    export default {
        props: ['pagination', 'client', 'filtered']
    }
</script>