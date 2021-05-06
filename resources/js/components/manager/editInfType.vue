<template>
<div>
  <!-- <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#updateInfl">
     <Icon type="md-create" />
  </button> -->
    <div class="modal fade" id="updateInflType2" tabindex="-1" role="dialog" aria-labelledby="updateInflType2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit="updateInflType"  enctype="multipart/form-data">
        <select class="custom-select" v-model="data.nomType">
            <option selected>Choisi le type</option>
            <option value="Instagram">Instagram</option>
            <option value="Facebook">Facebook</option>
            <option value="Youtube">Youtube</option>
          </select>
          <div class="_input_field">
          <Select filterable multiple v-model="data.domaineTab" placeholder="Select domaine">
                <Option v-for="(c,i) in domaine" :value="c.id" :key="i">{{ c.nom }}</Option>
            </Select>
            </div>
            <Row>
              <Col span="12" style="padding-right:10px">
                  <Select v-model="data.domaineTab2" filterable placeholder="Select domaine">
                      <Option v-for="(c,i) in domaine" :value="c.id" :key="i">{{c.nom}}</Option>
                  </Select>
              </Col>
              <Col span="12">
                  <Select v-model="data.domaineTab3" filterable multiple placeholder="Select domaine hist">
                      <Option v-for="(c,i) in domaineHis" :value="c.id" :key="i">{{ c.nom }}</Option>
                  </Select>
              </Col>
              <Button  icon="md-add" type="primary" shape="circle" @click="updateInflTypeDom"></Button>
          </Row>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
            <button type="submit"  class="btn btn-success">Cree</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</template>

<script>

import addInflInfo from "./addInflInfo";
export default{
     data(){
          return {
            domaine:{},
            domaineHis:{},
            data:{
              nomType:'',
              domaineTab:[],
              domaineTab2:'',
              domaineTab3:[]
            },
            data:{
              
            },
            prenom:'',
            ville:'',
            daten:'',
            test:'',
            image:null,
            personnes:{},
       };
    },
    created(){
            this.getPersonnes();
            this.getDomaine();
      this.getDomaineHis();
            // axios.get('/admin/users').then(response=>this.users=response.data)
            //         // console.log(response.data); 
            //     .catch(error=>console.log(error));
        },
    props:['personne3','personneid'],
    methods:{
      getPersonnes(){
                axios.get('/api/personne').then(response=>{
                    console.log(response.data);
                    this.personnes=response.data;
                    this.personnes2=response.data;
                    this.lastId=response.data[0].id;
                    this.lastId2=personnes.data[0].id;
                })
                .catch(error=>{console.log(error)})
            },
            getResults(page = 1) {
			axios.get('/api/personne?page=' + page)
				.then(response => {
					this.personnes = response.data;
				});
      },
      getDomaine(){
        axios.get('/api/personneTypeDomaine').then(response=>{
                    console.log(response.data);
                    this.domaine=response.data;
                })
                .catch(error=>{console.log(error)})
      },
      getDomaineHis(){
        axios.get('/api/personneTypeDomaineHis').then(response=>{
                    console.log(response.data);
                    this.domaineHis=response.data;
                })
                .catch(error=>{console.log(error)})
      },
      updateInflType(e){
        e.preventDefault();//pour ne pas actualiser la page
        axios.post("/api/personneTypeUpdate/"+this.personne3[1],this.data).then(res=>{
        this.$emit('personneInfo-updated',res)
        // $('#updateInfl').modal('hide');  
        // this.$refs.modalComponent.show(); 
        console.log('update pers info');
        Swal.fire({
          position:"center",
          icon:"success",
          title:"Personne modifie",
          showConfirmButton:false,
          timer:1500
        });
        
        // this.$emit('infl-added');
      }).catch(err=>console.log('hahaha'));
      },
       updateInflTypeDom(e){
        e.preventDefault();//pour ne pas actualiser la page
        axios.post('/api/personneTypeUpdateDom/'+this.personne3[1],this.data).then(res=>{
        this.$emit('personneInfo-updated',res)
        // $('#updateInfl').modal('hide');  
        // this.$refs.modalComponent.show(); 
        console.log('update pers info');
        Swal.fire({
          position:"center",
          icon:"success",
          title:"Personne modifie",
          showConfirmButton:false,
          timer:1500
        });
        
        // this.$emit('infl-added');
      }).catch(err=>console.log('hahaha'));
      },
    },
    
    }

</script>
