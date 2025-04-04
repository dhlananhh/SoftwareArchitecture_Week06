# ----- Stage 1: Build -----
# Sử dụng image golang để build ứng dụng
# Chọn phiên bản Go bạn đang sử dụng, ví dụ: 1.19
FROM golang:1.19-alpine AS builder

# Đặt thư mục làm việc
WORKDIR /app

# Copy file go.mod và go.sum để tải dependencies
COPY go.mod go.sum ./
RUN go mod download

# Copy toàn bộ source code
COPY *.go ./

# Build ứng dụng Go
# CGO_ENABLED=0: Tắt CGO để tạo binary tĩnh (không phụ thuộc thư viện C)
# GOOS=linux: Chỉ định build cho hệ điều hành Linux (môi trường chạy container)
# -o /app/main: Chỉ định output file là /app/main
RUN CGO_ENABLED=0 GOOS=linux go build -a -installsuffix cgo -o /app/main .

# ----- Stage 2: Run -----
# Sử dụng một base image siêu nhỏ (scratch hoặc alpine)
# scratch là image trống hoàn toàn, chỉ chứa file thực thi của bạn
# Alpine nhỏ gọn và có shell, tiện cho việc debug
FROM alpine:latest
# FROM scratch  # Tùy chọn: image nhỏ nhất có thể

# Đặt thư mục làm việc (nếu dùng alpine)
WORKDIR /root/
# Với scratch thì không cần WORKDIR

# Copy file thực thi đã được build từ stage 'builder'
COPY --from=builder /app/main .

# (Quan trọng nếu dùng Alpine và muốn chạy non-root)
# RUN addgroup -S appgroup && adduser -S appuser -G appgroup
# USER appuser

# Thông báo cổng mà ứng dụng lắng nghe
EXPOSE 8080

# Lệnh để chạy file thực thi khi container khởi động
CMD ["./main"]
