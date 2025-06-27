import { Stack } from "expo-router";
import { Provider as PaperProvider } from "react-native-paper";
import { SafeAreaProvider } from "react-native-safe-area-context";

export default function RootLayout() {
  return (
    <SafeAreaProvider>
      <PaperProvider theme={{ mode: "exact", dark: true }}>
        <Stack
          screenOptions={{ headerShown: false, animation: "slide_from_right" }}
          initialRouteName="login"
        >
          <Stack.Screen name="login" options={{ title: "Login" }} />
          <Stack.Screen
            name="(disciplinas)/disciplina"
            options={{ headerShown: false, title: "Minhas Disciplinas" }}
          />
          <Stack.Screen
            name="(disciplinas)/[disciplinaId]"
            options={{ title: "Notas da Disciplina" }}
          />
        </Stack>
      </PaperProvider>
    </SafeAreaProvider>
  );
}
