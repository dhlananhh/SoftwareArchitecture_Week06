package main

import (
    "fmt"
    "log"
    "net/http"
    "os"
)

func handler(w http.ResponseWriter, r *http.Request) {
    log.Printf("Received request from %s\n", r.RemoteAddr)
    fmt.Fprintf(w, "Hello from Go in Docker!")
}

func main() {
    port := "8080"
    if fromEnv := os.Getenv("PORT"); fromEnv != "" {
        port = fromEnv
    }
    log.Printf("Server starting on port %s\n", port)

    http.HandleFunc("/", handler)
    err := http.ListenAndServe(":"+port, nil)
    if err != nil {
        log.Fatal(err)
    }
}
