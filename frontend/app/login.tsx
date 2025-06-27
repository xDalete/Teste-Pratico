import React, { useState } from "react";
import { View } from "react-native";
import { TextInput, Button, Text } from "react-native-paper";
import { useRouter } from "expo-router";
import { login, setAuthToken } from "@/api/api";

export default function Login() {
  const router = useRouter();
  const [email, setEmail] = useState("");
  const [senha, setSenha] = useState("");

  const handleLogin = () => {
    console.log("Tentando fazer login com:", { email, senha });
    login(email, senha)
      .then((response) => {
        setAuthToken(response.token);
        router.replace("/(disciplinas)/disciplina");
      })
      .catch((error) => {
        console.log("Erro no login:", error);
        alert(error.response?.data?.message || "Erro ao fazer login");
      });
  };

  return (
    <View style={{ flex: 1, justifyContent: "center", padding: 20 }}>
      <Text
        variant="titleLarge"
        style={{ textAlign: "center", marginBottom: 20 }}
      >
        Login do Aluno
      </Text>
      <TextInput
        label="Email"
        value={email}
        onChangeText={setEmail}
        keyboardType="email-address"
        autoCapitalize="none"
        style={{ marginBottom: 10 }}
      />
      <TextInput
        label="Senha"
        value={senha}
        onChangeText={setSenha}
        secureTextEntry
        style={{ marginBottom: 20 }}
      />
      <Button mode="contained" onPress={handleLogin}>
        Entrar
      </Button>
    </View>
  );
}
