import axios from 'axios';

const apiUrl = 'http://localhost:8000/server.php';

interface form {
    questOne: string,
    questTwo: string,
    questThree: string
}

export const postRequest = async (data: form) => {
  try {
    const response = await axios.post(apiUrl, data);
    return response.data;
  } catch (error) {
    throw error; 
  }
};
