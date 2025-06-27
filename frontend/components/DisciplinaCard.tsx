import { DisciplinaType } from "@/api/types";
import { router } from "expo-router";
import { Card, Text } from "react-native-paper";

export default function DisciplinaCard({
  disciplina,
}: {
  disciplina: DisciplinaType;
}) {
  return (
    <Card
      key={disciplina.id}
      style={{ marginBottom: 12 }}
      onPress={() =>
        router.push({
          pathname: "/(disciplinas)/[disciplinaId]",
          params: { disciplinaId: disciplina.id.toString() },
        })
      }
    >
      <Card.Content>
        <Text>{disciplina.nome}</Text>
        <Text variant="labelSmall">Semestre: {disciplina.semestre}</Text>
      </Card.Content>
    </Card>
  );
}
