# Sử dụng base image Node.js phiên bản 18
FROM node:18

# Thiết lập thư mục làm việc bên trong container
WORKDIR /usr/src/app

# Sao chép file package.json và package-lock.json (nếu có)
# Sử dụng * để copy cả hai nếu tồn tại
COPY package*.json ./

# Cài đặt các dependencies (nếu có)
# Dù ví dụ này không có deps, bước này vẫn quan trọng cho các dự án thực tế
RUN npm install

# Sao chép toàn bộ mã nguồn của ứng dụng vào thư mục làm việc trong container
COPY . .

# Thông báo rằng container sẽ lắng nghe trên cổng 3000
EXPOSE 3000

# Lệnh để chạy ứng dụng khi container khởi động
CMD [ "node", "app.js" ]
