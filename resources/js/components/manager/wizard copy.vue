<template>
<div>
<div class="container">
    <div class="row d-flex justify-content-center mt-200"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Launch multistep Wizard </button> </div> <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                    <div id="smartwizard">
                        <form-wizard>
                            <tab-content title="About You" :selected="true">
                                <div class="form-group">
                                    <label for="fullName">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Enter your name" v-model="fullName">
                                </div>
                            </tab-content>
                            <tab-content title="About your Company"> 
                                <div class="form-group">
                                    <label for="companyName">Your Company Name</label>
                                    <input type="text" class="form-control" placeholder="Enter your Company / Organization name" v-model="companyName">
                                </div>
                            </tab-content>
                            <tab-content title="Finishing Up">
                                <div class="form-group">
                                    <label for="referral">From Where did you hear about us</label>
                                    <select class="form-control" v-model="referral">
                                        <option>Newspaper</option>
                                        <option>Online Ad</option>
                                        <option>Friend</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </tab-content>
                        </form-wizard>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
    
</template>

<script>
import {FormWizard, TabContent} from 'vue-step-wizard'
import "vue-step-wizard/dist/vue-step-wizard.css";


export default {
    name: 'BasicStepperForm',
    components: {
        FormWizard, TabContent
    },
    data(){
        return {
            fullName: '',
            companyName: '',
            referral: '',
        }
    },
}
</script>