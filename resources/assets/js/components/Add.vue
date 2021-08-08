<template>
  <div class="modal" :class='openmodal'>
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title ">Add New Contact</p>
        <button class="delete" aria-label="close" @click='close'></button>
      </header>
      <section class="modal-card-body">

        <!-- Content ... -->
        <div class="field">

          <label class="label">Name</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input" :class="{'is-danger':errors.name}" type="text" placeholder="name" v-model="list.name">
          <span class="icon is-small is-left">
            <i class="fa fa-user"></i>
          </span>
          </div>
          <small class="has-text-danger"  v-if="errors.name">{{errors.name[0]}}</small>
        </div>


        <div class="field">
          <label class="label">Phone</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input is-success" :class="{'is-danger':errors.phone}" type="number"  placeholder="phone"v-model="list.phone" >
            <span class="icon is-small is-left">
            <i class="fa fa-phone-square"></i>
          </span>
            <small class="has-text-danger"  v-if="errors.phone">{{errors.phone[0]}}</small>
          </div>

        <div class="field">
          <label class="label">Email</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input is-danger" :class="{'is-danger':errors.email}" type="email" placeholder="Email" value="hello@" v-model="list.email">
            <span class="icon is-small is-left">
      <i class="fa fa-envelope"></i>
    </span>
          </div>
          <small class="has-text-danger"  v-if="errors.email">{{errors.email[0]}}</small>
          </div>
        </div>

        <!--EndContent -->
      </section>
      <footer class="modal-card-foot">
        <button class="button is-info" @click='save'>Save changes</button>
        <button class="button" @click='close'>Cancel</button>
      </footer>
    </div>
  </div>
</template>
<script>
export default{
  props:['openmodal'],
  data(){
    return{
      list:{
        name:'',
        phone:'',
        email:''
      },
      errors:{}
    }
  },
  methods:{
    close(){
      this.$emit('closeRequest')
    },
    save(){
     axios.post('/phonebook',this.$data.list).then((response)=>this.close())
      .catch((error)=> this.errors= error.response.data.errors )
    },
  }
}
</script>