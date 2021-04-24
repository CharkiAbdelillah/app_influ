<template>
<div>
  <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modal2">
     Ajouter 3
  </button>
    <div class="modal fade" id="modal2" ref="modal2" tabindex="-1" aria-labelledby="personneInfoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="personneInfoLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit="addInflType" enctype="multipart/form-data">
          <!-- <input type="hidden" name="_token" v-bind:value="csrf"> -->
          <select class="custom-select" v-model="data.nomType">
            <option selected>Choisi le type</option>
            <option value="instagram">Instagram</option>
            <option value="Facebook">Facebook</option>
            <option value="Youtube">Youtube</option>
          </select>
          <FormItem label="Nombre d’abonnés">
            <Row>
                <Col span="11">
                    <FormItem prop="date">
                        <Input v-model="value2" placeholder="Number" />
                    </FormItem>
                </Col>
                <Col span="2" style="text-align: center">Engagement</Col>
                <Col span="11">
                    <FormItem prop="time">
                        <Input v-model="value2" placeholder="default" />
                    </FormItem>
                </Col>
            </Row>
            </FormItem>
            <FormItem label="Qualité d’audience" prop="name">
              <Input v-model="value14" placeholder="Enter something..." clearable style="width: 200px" />
            </FormItem>
            <FormItem label="Moyenne des likes">
            <Row>
                <Col span="11">
                    <FormItem prop="date">
                        <Input v-model="value2" placeholder="Number" />
                    </FormItem>
                </Col>
                <Col span="2" style="text-align: center">Moyenne des commentaires</Col>
                <Col span="11">
                    <FormItem prop="time">
                        <Input v-model="value2" placeholder="default" />
                    </FormItem>
                </Col>
            </Row>
            </FormItem>
            <FormItem label="Taille par rapport aux followers" prop="city">
              <Select v-model="formValidate.city" placeholder="Select your city">
                  <Option value="Nano(1k-10k)">Nano(1k-10k)</Option>
                  <Option value="Micro(10k-50k)">Micro(10k-50k)</Option>
                  <Option value="Mid-tier(50k-500k)">Mid-tier(50k-500k)</Option>
                  <Option value="Macro(500k-1m)">Macro(500k-1m)</Option>
                  <Option value="Mega(1m et +)">Mega(1m et +)</Option>
              </Select>
            </FormItem>
          <div class="_input_field">
          <Select filterable multiple v-model="data.domaineTab" placeholder="Select domaine">
                <Option v-for="(c,i) in domaine" :value="c.id" v-model="c.nom" :key="i">{{ c.nom }}</Option>
            </Select>
            </div>
            <Row>
              <Col span="12" style="padding-right:10px">
                  <Select v-model="data2.domaineTab2" filterable>
                      <Option v-for="(c,i) in domaine" :value="c.id" :key="i">{{c.nom}}</Option>
                  </Select>
              </Col>
              <Col span="12">
                  <Select v-model="data2.domaineTab3" filterable multiple>
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


export default{
     data(){
          return {
            domaine:{},
            domaineHis:{},
            data:{
              nomType:'',
              domaineTab:[],
            },
            data2:{
              domaineTab2:'',
              domaineTab3:[]
            }
            
       };
    },
    created(){
      this.getDomaine(),
      this.getDomaineHis()
    },
    methods:{
      async addInflType(e){
        e.preventDefault();//pour ne pas actualiser la page
        const res=await this.callApi('post','/api/personneType',this.data)
        if(res.status==200){
          this.s('Success')
        }else{
          this.swr()
        }
      },
      async addInflDomHis(e){
        e.preventDefault();//pour ne pas actualiser la page
        const res=await this.callApi('post','/api/personneTypeDomaineHisDom',this.data2)
        if(res.status==200){
          this.s('Success')
        }else{
          this.swr()
        }
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
      }
    }
}
</script>
