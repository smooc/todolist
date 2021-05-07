
<template id="task-list">
  <section class="TodoLists">
    <h1>
      TodoLists
      <transition name="fade">
        <small v-if="incomplete">({{ incomplete }})</small>
      </transition>
    </h1>

    <div class="TodoLists__new input-group">
      <input
        type="text"
        class="input-group-field"
        v-model="newTask"
        @keyup.enter="addTask"
        placeholder="New task"
      />
      <div class="TodoLists__clear button-group">
       
          <span class="input-group-button">
          <button @click="addTask" class="button">
              Add New
          </button>
        </span>
        </div>
    </div>


    <transition-group name="fade" tag="ul" class="TodoLists__list no-bullet">
      <task-item
        v-for="(task, index) in TodoLists"
        @remove="removeTask(index, task)"
        @complete="completeTask(task)"
        :task="task.todo_item[0]"
        :key="task.id"
        :is_completed="task.completed"
      >
      </task-item>
    </transition-group>
  </section>
</template>


<script>
export default {
  data() {
    return {
      TodoLists: [],
      TodoItems: [],
      newTask: "",
    };
  },

  mounted() {
    this.loadTodoLists();
  },

  template: "#task-list",
  props: ["token"],
  computed: {
    incomplete() {
      return this.TodoLists.filter(this.inProgress).length;
    },
  },
  methods: {
    addTask() {
      if (this.newTask) {
        // push data to todolist with api
        axios
          .request({
            url: "todoitem",
            method: "post",
            baseURL: "/api",
            headers: {
              Authorization: "Bearer " + this.token,
            },
            data: {
              name: this.newTask,
              language: 'en',
            },
          })
          .then((response) => {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });

        // this.TodoLists.push({
        //   title: this.newTask,
        //   completed: false,
        // });
        this.loadTodoLists();
        this.newTask = "";
      }
    },
    completeTask(task) {
      console.log(task);
      // make api call to complete list_item
      axios
        .request({
          url: "todoitem/" + task.id,
          method: "post",
          baseURL: "/api",
          headers: {
            Authorization: "Bearer " + this.token,
          },
          data: {
            completed: !task.completed,
          },
        })
        .then((response) => {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
      task.completed = !task.completed;
    },
    removeTask(index, task) {
      console.log(task);

      axios
        .request({
          url: "todoitem/" + task.id,
          method: "delete",
          baseURL: "/api",
          headers: {
            Authorization: "Bearer " + this.token,
          },
        })
        .then((response) => {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
      this.TodoLists.splice(index, 1);
    },

    inProgress(task) {
      return !this.isCompleted(task);
    },
    isCompleted(task) {
      return task.completed;
    },
    loadTodoLists: function () {
      axios
        .request({
          url: "todolist",
          method: "get",
          baseURL: "/api",
          headers: {
            Authorization: "Bearer " + this.token,
          },
        })
        .then((response) => {
          console.log(response);
          this.TodoLists = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
</script>

<style>
body {
  background-color: #abc;
}

*,
h1,
button {
  font-family: "Nunito", sans-serif;
}
.TodoLists h1{
  font-size: 22px;
  margin-block: 10px;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-active {
  opacity: 0;
}

.TodoLists {
  width: 100%;
  max-width: 45rem;
  padding: 1em;
  margin: 1em auto;
  overflow: auto;
  background-color: white;
  box-shadow: 0px 0.25rem 1rem rgba(black, 0.25);
}

.TodoLists__list {
  clear: both;
}
.TodoLists__clear{
  text-align-last: justify;
  padding: 16px;
}
.input-group{
    position: relative;
    display: block;
    text-align: end;
}
.input-group-field{
   width: 100%;
}
.input-group-button{
    border: 1px solid;
    padding: 12px;
    background-color: #717171;
    color: white;
}
</style>
