<template>
<div>
  <!-- <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#updateInfl">
     <Icon type="md-create" />
  </button> -->
    <div class="modal fade" id="updateInflInfo" tabindex="-1" role="dialog" aria-labelledby="updateInflInfo" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit="updateInflInfo" enctype="multipart/form-data">
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
                  <Select v-model="data2.domaineTab2" filterable placeholder="Select domaine">
                      <Option v-for="(c,i) in domaine" :value="c.id" :key="i">{{c.nom}}</Option>
                  </Select>
              </Col>
              <Col span="12">
                  <Select v-model="data2.domaineTab3" filterable multiple placeholder="Select domaine hist">
                      <Option v-for="(c,i) in domaineHis" :value="c.id" :key="i">{{ c.nom }}</Option>
                  </Select>
              </Col>
              <Button  icon="md-add" type="primary" shape="circle" @click="addInflDomHis"></Button>
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
            name:'',
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
            // axios.get('/admin/users').then(response=>this.users=response.data)
            //         // console.log(response.data); 
            //     .catch(error=>console.log(error));
        },
    props:['personne3'],
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
      updateInflInfo(e){
        e.preventDefault();//pour ne pas actualiser la page
        let formData=new FormData();//pour communiquer avec la form
        formData.append("id",this.personne2.id);
        formData.append("cheveux",this.personne2.cheveux);
        formData.append("kg",this.personne2.kg);
        formData.append("cm",this.personne2.cm);
        formData.append("couleur",this.personne2.couleur);
        formData.append("longueur",this.personne2.longueur);
        formData.append("niveux",this.personne2.niveux);
        formData.append("nombre",this.personne2.nombre);
        formData.append("situation",this.personne2.situation);
        formData.append("specialite",this.personne2.specialite);
        formData.append("situation",this.personne2.situation);
        formData.append("yeux",this.personne2.yeux);
        formData.append("_method","put");//pour dire que on a en train de modifer
        // formData.append("image",this.image);
        axios.post("/api/personneInfo/"+this.personne2.id,formData).then(res=>{
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
      }
    }
}
</script>
