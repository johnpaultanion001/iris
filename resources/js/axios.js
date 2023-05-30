import axios from 'axios'

axios.defaults.baseURL = 'http://dti-internal.ap-southeast-1.elasticbeanstalk.com';

axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token');

// axios.interceptors.response.use(resp => resp, async error =>{
//     if(error.response.status === 401){
//         const {status, data} = await axios.post('refresh', {}, { withCredentials: true});

//         if(status === 200){
//             axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token');

//             return axios(error.config);
//         }
//     }

//     return error;
// })