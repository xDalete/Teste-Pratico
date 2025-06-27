import React, { useEffect, useState } from "react";
import { View } from "react-native";
import { Card, Text } from "react-native-paper";
import { useLocalSearchParams } from "expo-router";
import { getNotasFromDisciplina } from "@/api/api";
import { SafeAreaView } from "react-native-safe-area-context";
import { NotaType } from "@/api/types";

export default function Notas() {
  const { disciplinaId } = useLocalSearchParams();
  const [notas, setNotas] = useState<NotaType>();
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const loadDisciplina = async () => {
      console.log("Parâmetros da rota:", disciplinaId);
      const response = await getNotasFromDisciplina(
        parseInt(disciplinaId as string)
      );
      console.log("Dados da disciplina:", response.data);
      setNotas(response.data);
      setLoading(false);
    };
    loadDisciplina();
  }, [disciplinaId]);

  return (
    <SafeAreaView>
      <View style={{ padding: 16 }}>
        {!notas && !loading ? (
          <Text>Disciplina não encontrada.</Text>
        ) : (
          <>
            {notas ? (
              <>
                <Text variant="titleLarge" style={{ marginBottom: 16 }}>
                  {notas.disciplina.nome} ({notas.disciplina.semestre})
                </Text>
                <Card style={{ marginTop: 16 }}>
                  <Card.Content>
                    {notas.notas.map((nota) => (
                      <Text key={nota}>Nota: {nota}</Text>
                    ))}
                    <Text style={{ marginTop: 10, fontWeight: "bold" }}>
                      Média Final: {notas.media}
                    </Text>
                  </Card.Content>
                </Card>
              </>
            ) : (
              <Text variant="titleLarge" style={{ marginBottom: 16 }}>
                Carregando...
              </Text>
            )}
          </>
        )}
      </View>
    </SafeAreaView>
  );
}
