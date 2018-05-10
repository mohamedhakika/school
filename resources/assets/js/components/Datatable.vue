<template>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead class="bg-secondary">
        <tr>
          <th>No.</th>
          <th v-for="column in columns" :key="column.name" @click="$emit('sort', column.name)"
              :style="'cursor:pointer;'">
              {{column.label}} 
                <template v-if="sortKey === column.name">
                  <span v-if="sortOrders[column.name] > 0" v-html="sorting_asc"></span>
                  <span v-else v-html="sorting_desc"></span>
                </template>
                <template v-else>
                  <span v-html="sorting"></span>
                </template>
          </th>
          <th class="text-center align-middle">Options</th>
        </tr>
      </thead>
      
      <slot></slot>
    </table>
  </div>
</template>

<script>
  export default {
      props: ['columns', 'sortKey', 'sortOrders'],
      data () {
        return {
          sorting_asc: '<i class="fas fa-sort-up"></i>',
          sorting_desc: '<i class="fas fa-sort-down"></i>',
          sorting: '<i class="fas fa-sort" style="color:#c8c8c8"></i>'
        }
      }
  }
</script>