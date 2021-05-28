<template>
<div>
  <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modal1">
     Ajouter 2
  </button>
    <div class="modal fade" id="modal1" ref="modal1" tabindex="-1" aria-labelledby="personneInfoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="personneInfoLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit="addInflInfo" enctype="multipart/form-data">
          <!-- <input type="hidden" name="_token" v-bind:value="csrf"> -->
          <div class="row">
            Taille:
            <div class="col-3">
              <input type="text" v-model="cm" class="form-control" placeholder="cm">
            </div>
            <div class="col-3">
              <input type="text" v-model="kg" class="form-control" placeholder="kg">
            </div>
          </div>
          <!-- <Select v-model="model9" placeholder="hi" style="width:200px">
        <Option value="New York" label="New York">
            <span>New York</span>
            <span style="float:right;color:#ccc">America</span>
        </Option>
        </Select> -->
        <br>
        <Row>
            <Col span="12" style="padding-right:10px">
                <Select placeholder="Cheveux" v-model="cheveux" filterable>
                    <Option value="Noir">Noir</Option>
                    <Option value="Brun">Brun</Option>
                    <Option value="Chatain">Chatain</Option>
                    <Option value="Blond">Blond</Option>
                    <Option value="Roux">Roux</Option>
                </Select>
            </Col>
            <Col span="12">
                <Select placeholder="Longueur" v-model="longueur" filterable>
                    <Option value="Très court">Très court</Option>
                    <Option value="Court">Court</Option>
                    <Option value="Chatain">Chatain</Option>
                    <Option value="Mi-long">Mi-long</Option>
                    <Option value="Long">Long</Option>
                </Select>
            </Col>
        </Row><br>
        <Row>
            <Col span="12" style="padding-right:10px">
                <Select placeholder="Nature" v-model="nature" filterable>
                    <Option value="Lisse">Lisse</Option>
                    <Option value="Ondulés">Ondulés</Option>
                    <Option value="Bouclés">Bouclés</Option>
                    <Option value="Crépus">Crépus</Option>
                </Select>
            </Col>
            <Col span="12">
                <Select placeholder="Couleur de peau" v-model="couleur" filterable>
                    <Option value="Blanche">Blanche</Option>
                    <Option value="Beige">Beige</Option>
                    <Option value="Matte">Matte</Option>
                    <Option value="Noir">Noir</Option>
                </Select>
            </Col>
        </Row>
        <br>
        <Row>
            <Col span="12" style="padding-right:10px">
                <Select placeholder="Yeux" v-model="yeux" filterable>
                    <Option value="Noir">Noir</Option>
                    <Option value="Brun">Brun</Option>
                    <Option value="Vert">Vert</Option>
                    <Option value="Bleu">Bleu</Option>
                </Select>
            </Col>
            <Col span="12">
                <Select placeholder="Niveau éducatif" v-model="niveau" filterable>
                    <Option value="Bac">Bac</Option>
                    <Option value="Bac+2 (DEUG)">Bac+2 (DEUG)</Option>
                    <Option value="Bac+3 (Licence)">Bac+3 (Licence)</Option>
                    <Option value="Bac+5 (Master)">Bac+5 (Master)</Option>
                    <Option value="Bac+8 (Doctorat)">Bac+8 (Doctorat)</Option>
                </Select>
            </Col>
        </Row>
        <br>
        <Row>
            <Col span="12" style="padding-right:10px">
                <Select placeholder="Specialite" v-model="specialite" filterable>
                    <Option value="Spécialité">Spécialité</Option>
                    <Option value="Journalisme">Journalisme</Option>
                    <Option value="Économie">Économie</Option>
                    <Option value="Ingénierie">Ingénierie</Option>
                    <Option value="Informatique">Informatique</Option>
                    <Option value="Médecine">Médecine</Option>
                    <Option value="Autre…">Autre…</Option>
                </Select>
            </Col>
            <Col span="12">
                <Select placeholder="Situation matrimoniale" v-model="situation" filterable>
                    <Option value="Marié">Marié</Option>
                    <Option value="Célibataire">Célibataire</Option>
                </Select>
            </Col>
        </Row>
        <br>
        <Row v-if="this.situation!='Célibataire'">
            <Col span="12">
                <Select placeholder="Nombre d'enfants" v-model="nombre" filterable>
                    <Option value="1 enfant">1 enfant</Option>
                    <Option value="2 enfants">2 enfants</Option>
                    <Option value="3 enfants et plus">3 enfants et plus</Option>
                </Select>
            </Col>
        </Row>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
            <button type="submit" class="btn btn-success">Cree</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</template>

<script>


export default{
     data(){
          return {
            cm:'',
            kg:'',
            cheveux:'',
            longueur:'',
            nature:'',
            couleur:'',
            yeux:'',
            niveau:'',
            specialite:'',
            situation:'',
            nombre:'rien',
            // image:null
            
       };
    },
    methods:{
      show(){
              this.$refs.modal1.show();
            },
      hideModal() {
            $("#modal1").removeClass("in");
            $(".modal-backdrop").remove();
            $("#modal1").hide();
      },
      addInflInfo(e){
        e.preventDefault();//pour ne pas actualiser la page
        let formData=new FormData();//pour communiquer avec la form
        formData.append("cm",this.cm);
        formData.append("kg",this.kg);
        formData.append("cheveux",this.cheveux);
        formData.append("longueur",this.longueur);
        formData.append("nature",this.nature);
        formData.append("couleur",this.couleur);
        formData.append("yeux",this.yeux);
        formData.append("niveu1",this.niveau);
        formData.append("specialite",this.specialite);
        formData.append("situation",this.situation);
        formData.append("nombre",this.nombre);
        axios.post("/api/personneInfo",formData).then(res=>{
          this.hideModal();
          this.s('inf info has been created successfully!')
          this.$emit('personneInfo-added',res)
        // $('#addInfl').modal('hide');  
        // this.$emit('infl-added')
        // this.$refs.modalComponent.show();
        // $('#addInfl').modal('hide');
        console.log('hi')
      }).catch(function (error) {
        if (error.response) {
          if(error.response.status==500){
                for(let i in error.response.data){
                      // this.e(res.data.errors[i][0])
                      Swal.fire({
                        position:"center",
                        icon:"warning",
                        title:'vous devez remplire tous les champs',
                        showConfirmButton:false,
                        timer:1500
                      });
                  }

          
        }else{
                // this.swr()
                Swal.fire({
                        position:"center",
                        icon:"error",
                        title:'something wrong',
                        showConfirmButton:false,
                        timer:1500
                      });
              }
              console.log(error.response.data);
              console.log(error.response.status);
              console.log(error.response.headers);
              }
      });
      }
    }
}
</script>
