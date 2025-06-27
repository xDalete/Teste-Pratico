export type ResponseType<T> = {
  data: T;
  status: string;
  message?: string;
}

export type DisciplinaType = {
  id: number;
  nome: string;
  semestre: number;
};

export type MatriculaType = {
  id: number;
  disciplina: DisciplinaType;
  semestre: number;
};

export type NotaType = {
  id: number;
  notas: number[];
  media: number;
  disciplina: DisciplinaType;
};

export type AlunoType = {
  id: number;
  nome: string;
  email: string;
};
