<!DOCTYPE html>
<html>
<head>
	<title>Autocomplete textbox with Vue.js PHP and MySQL</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- Script -->
	<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
	<script src='https://unpkg.com/axios/dist/axios.min.js'></script>
	<!-- <script src='axios-master/dist/axios.min.js'></script> -->

</head>
<body>

	<div id='myapp' >

		<!-- Auto complete element 1 -->
		<vueauto-complete v-model="userid1" @input="handleInput1()"></vueauto-complete>
		
		<!-- Selected item -->
		<p><b>Selected UserID - {{ userid1 }}</b> </p>

		<br>
		<!-- Auto complete element 2 -->
		<vueauto-complete v-model="userid2" @input="handleInput2()"></vueauto-complete>

		<!-- Selected item -->
		<p><b>Selected UserID - {{ userid2 }}</b> </p>

	</div>
	
	<!-- Script -->
	<script >

	Vue.component('vueauto-complete', {
	  	data: function () {
	    	return {
	      		searchText:'',
        		suggestiondata:[]
	    	}
	  	},
	  	template: `<div class='autocompleteel' > 
	  		<div >
		  		<input type='text' @keyup='loadSuggestions' placeholder='Enter some text' 
		  			v-model='searchText' 
      			>	<br> 
		  		<div class='suggestionlist' v-if="suggestiondata.length" >
		  		<ul > 
		  			<li v-for= '(item,index) in suggestiondata' @click='itemSelected(index)' > 
		  				{{ item.name }} 
		  			</li>  
		  		</ul>
		  		</div>  
	  		</div>
	  	</div>`, 
	  	methods: {
			loadSuggestions: function(e){
				var el = this;
				this.suggestiondata = [];
				
				if(this.searchText != ''){

					axios.get('ajaxfile.php', {
						params: {
							search: this.searchText
						}
					})
					.then(function (response) {
						el.suggestiondata = response.data;
					});

				}	
					
			},
			itemSelected: function(index){
				var id = this.suggestiondata[index].id;	
				var name = this.suggestiondata[index].name;	

				this.searchText = name;
				this.suggestiondata = [];

				this.$emit("input", id);
				
			}

		},
	})

	var app = new Vue({
	  	el: '#myapp',
	  	data: {
		    userid1: 0,
		    userid2: 0
		},
		methods: {
			handleInput1: function(){
				console.log("value : " + this.userid1);
			},
			handleInput2: function(){
				console.log("value : " + this.userid2);
			}
		}
	})


	</script>
</body>
</html>
