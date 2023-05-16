import axios from 'axios'

axios.defaults.baseURL = 'http://dti-internal.ap-southeast-1.elasticbeanstalk.com';

axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token');