<template>
<div>
<div class="container">
    <div class="row d-flex justify-content-center mt-200"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#wizardTotal" data-backdrop="static" data-keyboard="false"> Launch multistep Wizard </button> </div> <!-- Modal -->
    <div class="modal fade" id="wizardTotal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
  <form-wizard @onComplete="onComplete">
    <tab-content title="Données personnelles" :selected="true">
      <div class="form-group">
        <label for="fullName">Full Name</label>
        <input
          type="text"
          class="form-control"
          :class="hasError('fullName') ? 'is-invalid' : ''"
          placeholder="Enter your name"
          v-model="formData.fullName"
        >
        <div v-if="hasError('fullName')" class="invalid-feedback">
          <div class="error" v-if="!$v.formData.fullName.required">Please provide a valid name.</div>
        </div>
      </div>
      <div class="form-group">
        <label for="email">Your Email</label>
        <input
          type="email"
          class="form-control"
          :class="hasError('email') ? 'is-invalid' : ''"
          placeholder="Enter your email"
          v-model="formData.email"
        >
        <div v-if="hasError('email')" class="invalid-feedback">
          <div class="error" v-if="!$v.formData.email.required">Email field is required</div>
          <div class="error" v-if="!$v.formData.email.email">Should be in email format</div>
        </div>
      </div>
    </tab-content>
    <tab-content title="Critères physiques">
      <div class="form-group">
        <label for="companyName">Your Company Name</label>
        <input
          type="text"
          class="form-control"
          :class="hasError('companyName2') ? 'is-invalid' : ''"
          placeholder="Enter your Company / Organization name"
          v-model="formData.companyName2"
        >
        <div v-if="hasError('companyName2')" class="invalid-feedback">
          <div
            class="error"
            v-if="!$v.formData.companyName2.required"
          >Please provide a valid company name.</div>
        </div>
      </div>
      <div class="form-group">
        <label for="numberOfEmployees">Number of Employees</label>
        <input
          type="text"
          class="form-control"
          :class="hasError('numberOfEmployees2') ? 'is-invalid' : ''"
          placeholder="Enter Total Number of Employees"
          v-model="formData.numberOfEmployees2"
        >
        <div v-if="hasError('numberOfEmployees2')" class="invalid-feedback">
          <div
            class="error"
            v-if="!$v.formData.numberOfEmployees2.required"
          >Please provide number of employees in your company.</div>
          <div class="error" v-if="!$v.formData.numberOfEmployees2.numeric">Should be a valid value.</div>
        </div>
      </div>
    </tab-content>
    <tab-content title="About your Company">
      <div class="form-group">
        <label for="companyName">Your Company Name</label>
        <input
          type="text"
          class="form-control"
          :class="hasError('companyName') ? 'is-invalid' : ''"
          placeholder="Enter your Company / Organization name"
          v-model="formData.companyName"
        >
        <div v-if="hasError('companyName')" class="invalid-feedback">
          <div
            class="error"
            v-if="!$v.formData.companyName.required"
          >Please provide a valid company name.</div>
        </div>
      </div>
      <div class="form-group">
        <label for="numberOfEmployees">Number of Employees</label>
        <input
          type="text"
          class="form-control"
          :class="hasError('numberOfEmployees') ? 'is-invalid' : ''"
          placeholder="Enter Total Number of Employees"
          v-model="formData.numberOfEmployees"
        >
        <div v-if="hasError('numberOfEmployees')" class="invalid-feedback">
          <div
            class="error"
            v-if="!$v.formData.numberOfEmployees.required"
          >Please provide number of employees in your company.</div>
          <div class="error" v-if="!$v.formData.numberOfEmployees.numeric">Should be a valid value.</div>
        </div>
      </div>
    </tab-content>
    <tab-content title="Finishing Up">
      <div class="form-group">
        <label for="referral">From Where did you hear about us</label>
        <select
          :class="hasError('referral') ? 'is-invalid' : ''"
          class="form-control"
          v-model="formData.referral"
        >
          <option>Newspaper</option>
          <option>Online Ad</option>
          <option>Friend</option>
          <option>Other</option>
        </select>
        <div v-if="hasError('referral')" class="invalid-feedback">
          <div class="error" v-if="!$v.formData.referral.required">Please select on of the fields.</div>
        </div>
      </div>
      <div class="form-group form-check">
        <input
          type="checkbox"
          :class="hasError('terms') ? 'is-invalid' : ''"
          class="form-check-input"
          v-model="formData.terms"
        >
        <label class="form-check-label">I accpet terms & conditions</label>
        <div v-if="hasError('terms')" class="invalid-feedback">
          <div class="error" v-if="!$v.formData.terms.required">Please select terms and conditions.</div>
        </div>
      </div>
    </tab-content>
  </form-wizard>
  </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import { FormWizard, TabContent, ValidationHelper } from "vue-step-wizard";
import "vue-step-wizard/dist/vue-step-wizard.css";
import { required } from "vuelidate/lib/validators";
import { email } from "vuelidate/lib/validators";
import { numeric } from "vuelidate/lib/validators";

export default {
  name: "StepFormValidation",
  components: {
    FormWizard,
    TabContent
  },
  mixins: [ValidationHelper],
  data() {
    return {
      formData: {
        fullName: "",
        email: null,
        companyName: null,
        numberOfEmployees: null,
        companyName2: null,
        numberOfEmployees2: null,
        referral: null,
        terms: false
      },
      validationRules: [
        { fullName: { required }, email: { required, email } },
        { companyName2: { required }, numberOfEmployees2: { required, numeric } },
        { companyName: { required }, numberOfEmployees: { required, numeric } },
        { referral: { required }, terms: { required } }
      ]
    };
  },
  methods: {
    onComplete() {
      alert("Submitting Form ! Rock On");

    }
  }
};
</script>