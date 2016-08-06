import Vue from 'vue'
import VueResource from 'vue-resource'
Vue.use(VueResource)

Vue.component('users',{
	template: '#users-template',
	// Here we can register any values or collections that hold data
    // for the application
    data: function() {
		return{
			user: { name: '', last_login: '' },
        	users: []
		}
    },

    // Anything within the ready function will run when the application loads
    ready: function() {
        // When the application loads, we want to call the method that initializes
        // some data
        this.fetchUsers();
    },

    // Methods we want to use in our application are registered here
    methods: {


        // We dedicate a method to retrieving and setting some data
        fetchUsers: function() {
        	
			this.$http.get('https://api.langtal.com/v1/users')
			.then(function(users) {
				this.$set('users', users.json());
			}).error(function(error) {
			  console.log(error);
			});
        },

        // Adds an user to the existing users array
        addUser: function() {
            if (this.user.name) {
                this.users.push(this.user);
                this.user = {name: '', last_login: '' };
            }
        },

		deleteUser: function(index) {
            if (confirm("Are you sure you want to delete this user?")) {
                // $remove is a Vue convenience method similar to splice
                this.users.$remove(index);
            }
        }
    }
});

new Vue({

    // We want to target the div with an id of 'users'
    el: 'body',
});

(function(){
  $(window).scroll(function () {
      var top = $(document).scrollTop();
      $('.splash').css({
        'background-position': '0px -'+(top/3).toFixed(2)+'px'
      });
      if(top > 50)
        $('#home > .navbar').removeClass('navbar-transparent');
      else
        $('#home > .navbar').addClass('navbar-transparent');
  });
})();