import axios from 'axios'
import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from "vuex-persistedstate";
Vue.use(Vuex)

const store = new Vuex.Store({
   plugins: [createPersistedState()],
    state:{
        hi:'hi abdo',
        category23s: [],
        posts: {},
        iddd:'',
        todos:[
            {id:1,name:'apple1',age:12},
            {id:2,name:'apple2',age:16},
            {id:3,name:'apple3',age:18},
            {id:4,name:'apple4',age:5},
        ]
    },
    getters: {
        todosdone(state){
            return state.todos.filter(todo=>todo.age>12)
        },
        getOnePersonne(state){
           return state.posts.filter(per=>per.id==state.iddd)
        }
        ,
        getCategoryFormGetters2(state){ //take parameter state
           return state.category
        },
        getPosts1({ commit }) {
         axios.get('/api/personneLast')
         .then(response => {
            return response.data;
         })
         }
     },
    actions: {
      getPosts({ commit }) {
         axios.get('/api/personneWithoutPagination')
         .then(response => {
            commit('SET_Personne', response.data.perso)
         })
         }
       ,
        allCategoryFromDatabase(context){
 
           axios.get("api/personne")
 
                .then((response)=>{
                   console.log('dedefr: '+response.data)
                   context.commit("categories",response.perso.data) //categories will be run from mutation
                })
                .catch(()=>{
                   console.log("Error........")
                })
        }
     },
     mutations: {
      passId(state,id){
         state.iddd=id
      },
      SET_Personne(state, posts) {
         state.posts = posts
      },
      categories(state,id) {
            axios.get("user/personne/"+id).then((response)=>{
                   // console.log('dedefr: '+response.data)
                context.commit("categories",response.perso.data) //categories will be run from mutation
             })
             .catch(()=>{
                console.log("Error........")
             })
           return state.category = id
        }
     }
})

export default store