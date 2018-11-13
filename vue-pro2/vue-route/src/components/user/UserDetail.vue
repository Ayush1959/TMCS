<template>
    <div>
        <h3>Some user detail</h3>
        <p>User Id is : {{ $route.params.id }}</p>
        <router-link
            tag="button"
            :to="{ 
                name: 'userEdit', 
                params: { id: $route.params.id }, 
                query: { locale: 'en', q: 100 }, 
                hash: '#data' }"
            class="btn btn-primary">
            Edit User
        </router-link>
    </div>
</template>


<script>
export default {
  beforeRouteEnter(to, from, next) {
    if (true) {
      next();
    } else {
      next(false);
    }
  }
};
</script>
