/* eslint-disable prettier/prettier */
import axios from "axios";

export const api = axios.create({
  baseURL: "http://localhost:8080/api/appliance/",
  timeout: 15000,
});

export default api