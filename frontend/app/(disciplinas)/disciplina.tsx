import React, { useCallback, useState } from "react";
import { ScrollView } from "react-native";
import { Text } from "react-native-paper";
import { SafeAreaView } from "react-native-safe-area-context";
import DisciplinaCard from "@/components/DisciplinaCard";
import { getAlunoMatriculas } from "@/api/api";
import { useFocusEffect } from "expo-router";
import { MatriculaType } from "@/api/types";

export default function Disciplinas() {
  const [matriculas, setMatriculas] = useState<MatriculaType[]>([]);

  useFocusEffect(
    useCallback(() => {
      const loadDisciplina = async () => {
        const response = await getAlunoMatriculas();
        console.log("Dados da disciplina:", response.data);
        setMatriculas(response.data);
      };
      loadDisciplina();
    }, [])
  );

  return (
    <SafeAreaView>
      <ScrollView contentContainerStyle={{ padding: 16 }}>
        <Text variant="titleLarge" style={{ marginBottom: 16 }}>
          Minhas Disciplinas
        </Text>
        {matriculas.map((matricula) => (
          <DisciplinaCard
            key={matricula.disciplina.id}
            disciplina={matricula.disciplina}
          />
        ))}
      </ScrollView>
    </SafeAreaView>
  );
}
