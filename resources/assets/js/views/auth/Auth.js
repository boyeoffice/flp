export default function (Vue) {
	Vue.auth = {
		isAuthenticated: () => {
           if(window.User) 
           	return true
          else
           	return false
           
		}
	}

Object.defineProperties(Vue.prototype, {
	$auth: {
		get: () => {
			return Vue.auth
		} 
	}
})
}