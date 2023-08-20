import { createStore } from 'vuex';
import axios from 'axios'

const store = createStore({
    state() {
        return {
            products: []
        }
    },
    mutations: {
        fetchProducts(state, payload) {
            state.products = payload
        }
    },
    actions: {
        async fetchProducts(context) {
            const dbUrl = 'http://localhost/ScandiProject_V2_dev/backend/get_products.php'

            await axios.get(dbUrl).then((res) => {

            const response = res.data
              
            //console.log(response)
            
            context.commit('fetchProducts', response)
            })
        }
    },
    getters: {
        products(state) {
            return state.products
        }
    }
})

export default store