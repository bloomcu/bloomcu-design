<template>
  <form class="login-form" action="#" @submit.prevent="login()">
    <!-- {{ inputs }} -->
    <div class="text-component text-center margin-bottom-sm">
      <h2>Log in</h2>
    </div>
    
    <div class="margin-bottom-sm">
      <label class="form-label margin-bottom-xxs" for="email">Email</label>
      <input 
        v-model="inputs.email"
        type="text" 
        name="email" 
        required
        autofocus
        class="form-control width-100%" 
      >
    </div>
    
    <div class="margin-bottom-sm">
      <label class="form-label margin-bottom-xxs" for="password">Password</label>
      <input 
        v-model="inputs.password"
        type="password" 
        name="password" 
        required
        class="form-control width-100%" 
      >
    </div>
  
    <div class="margin-bottom-sm">
      <button class="btn btn--primary btn--md width-100%">Login with email</button>
    </div>
  </form>
</template>

<script setup>
import { ref } from 'vue'

const inputs = ref({
  email: '',
  password: ''
})

function login() {
  const { email, password } = inputs.value
  
  // console.log(email, password)
  // authStore.login(email, password)
  //   .then(() => {
  //     // TODO: Push me to an organization dashboard with next steps
  //     router.push({ name: 'assetsIntake', params: { organization: authStore.organization } })
  //     // router.push({ name: 'organizations' })
  //   })
}
</script>
