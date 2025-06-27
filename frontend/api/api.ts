import axios from "axios";
import { AlunoType, MatriculaType, NotaType, ResponseType } from "./types";

// Configuração do Axios para a API

const baseURL =
  process.env.EXPO_PUBLIC_API_BASE_URL || "http://127.0.0.1:8000/api";
console.log("Base URL da API:", baseURL);

const api = axios.create({
  baseURL: baseURL,
});

// Adiciona o token automaticamente em todas as requisições
export const setAuthToken = (token: string | null) => {
  if (token) {
    api.defaults.headers.common["Authorization"] = `Bearer ${token}`;
  } else {
    delete api.defaults.headers.common["Authorization"];
  }
};
api.defaults.headers.common["Content-Type"] = "application/json";

export const login = async (email: string, password: string) => {
  const response = await api.post("/login", {
    email,
    password,
  });
  return response.data;
};

export const getAlunoProfile = async () => {
  const response = await api.get<ResponseType<AlunoType>>("/aluno");
  return response.data;
};

export const getAlunoMatriculas = async () => {
  const response = await api.get<ResponseType<MatriculaType[]>>(`/aluno/matriculas`);
  return response.data;
};

export const getNotasFromDisciplina = async (disciplinaId: number) => {
  const response = await api.get<ResponseType<NotaType>>(`/disciplinas/${disciplinaId}/notas`);

  return response.data;
};

export default api;
