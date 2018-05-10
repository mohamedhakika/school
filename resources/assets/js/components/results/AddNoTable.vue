<template>
  <div class="row align-items-center justify-content-center">
      <div class="col-md-6">
        <form method="POST" action="/result/store">
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
                  <input type="text" name="marks[]" class="form-control" id="marks" placeholder="Enter marks" required> 
                </td>
                <td> <a href="#" class="badge badge-danger" @click="removeStudent(index)"> X </a> </td>
              </tr>
            </tbody>
          </table>
          <hr>
          <div class="btn-toolbar mb-2 mb-md-0">
              <button type="submit" class="btn btn-primary mt-3">
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
      data () {
        return {
            filstudents: this.students,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
      },

      methods: {
        removeStudent(index) {
          this.filstudents.splice(index, 1);
        }
      }
  }
</script>