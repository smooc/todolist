<template>
  <ais-instant-search :search-client="searchClient" index-name="todo_items">
    <ais-search-box />
    <ais-hits>
      <div slot="item" slot-scope="{ item }">
        <h2>{{ item.name }}</h2>
      </div>
    </ais-hits>
  </ais-instant-search>
</template>

<script>
import algoliasearch from 'algoliasearch/lite';
import 'instantsearch.css/themes/satellite-min.css';

export default {
  data() {
    return {
      searchClient: algoliasearch(
        'BA3A4E4KDL',
        'cf13c88a4bc1a22f139447f3a3f2fc8d'
      ),
    };
  },
};
</script>

<style>
body {
  font-family: sans-serif;
  padding: 1em;
}
</style>
