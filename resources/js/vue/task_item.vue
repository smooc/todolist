<template id="task-item">
  <li class="TodoLists__item">
    <button :class="className" @click.self="$emit('complete',task.id)">
      {{ task.name }}
    </button>
    <button
      class="TodoLists__item__remove button alert pull-right"
      @click="$emit('remove')"
    >Remove
      <i class="fa fa-times"></i>
    </button>
  </li>
</template>
<script>
export default {
  template: "#task-item",
  props: ["task","is_completed"],
  computed: {
    className() {
      let classes = ["TodoLists__item__toggle"];
      if (this.is_completed) {
        classes.push("TodoLists__item__toggle--completed");
      }
      return classes.join(" ");
    },
  },
};
</script>
<style>
.TodoLists__item {
  margin-bottom: 0.5em;
  position: relative;
}

.TodoLists__item__toggle {
  cursor: pointer;
  width: 100%;
  text-align: left;
  padding: 0.85em 2.25em 0.85em 1em;
  background-color: rgba(black, 0.05);
  border: 1px solid rgba(black, 0.1);
}

.TodoLists__item__toggle:hover {
  background-color: rgba(black, 0.1);
  border-color: rgba(black, 0.15);
}

.TodoLists__item__toggle--completed {
  text-decoration: line-through;
  background-color: rgba(green, 0.15);
  border-color: rgba(green, 0.2);
}

.TodoLists__item__toggle--completed:hover {
  background-color: rgba(green, 0.25);
  border-color: rgba(green, 0.3);
}

.TodoLists__item__remove {
  position: absolute;
  height: 100%;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
}
.TodoLists__item__remove i {
  vertical-align: middle;
}
</style>