<template>
  <header>
    <nav>
      <ul>
        <li v-if="!isUserHome">
          <button>
            <router-link to="/">Cancel</router-link>
          </button>
        </li>
        <li v-else-if="isUserHome">
          <button>
            <router-link to="/addproduct">ADD</router-link>
          </button>
        </li>
      </ul>
    </nav>
  </header>
</template>

<script>
export default {
  computed: {
    isUserHome() {
      if (this.$route.path === '/') {
        return true
      }
      return false
    }
  } 
}
</script>

<style scoped>
header {
  width: 100%;
  height: 5rem;
  background-color: #570080;
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.26);

}

nav {
  height: 100%;
}

ul {
  list-style: none;
  margin: 0;
  padding: 0;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

li {
  margin: 0 1rem;
}

a {
  text-decoration: none;
  color: white;
  font-size: 1.25rem;
}

a:hover,
a:active,
a.router-link-active {
  color: #fca55e;
}

button {
  background: none;
  border: none;
  padding: 0;
  margin: 0;
  font: inherit;
  color: inherit;
  cursor: pointer;
}
</style>