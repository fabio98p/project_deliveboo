new Vue({
  el: "#history",
  data () {
    return {
      id: window.id,
      posts : [''],
      page: 1,
      perPage: 9,
      pages: [],
    }
  },
  created() {
    console.log(this.id);
      axios.get(`http://localhost:8000/api/ordersShow/${this.id}`).then((response) => {
          this.posts = response.data.response;

      })



  },
  methods:{
    getTime(post) {
      this.post = post.substr(11, 5) ;
      return (this.post)
    },
    getDay(post) {
      this.post = post.substr(0, 10) ;
      return (this.post)
    },
    setPages () {
			let numberOfPages = Math.ceil(this.posts.length / this.perPage);
			for (let index = 1; index <= numberOfPages; index++) {
				this.pages.push(index);
			}
		},
		paginate (posts) {
			let page = this.page;
			let perPage = this.perPage;
			let from = (page * perPage) - perPage;
			let to = (page * perPage);
			return  posts.slice(from, to);
		}
	},
	computed: {
		displayedPosts () {
			return this.paginate(this.posts);
		}
	},
	watch: {
		posts () {
			this.setPages();
		}
	},
	filters: {
		trimWords(value){
			return value.split(" ").splice(0,20).join(" ") + '...';
		}
	}
})
