# Sử dụng base image Python 3.9
FROM python:3.9-slim

# Thiết lập thư mục làm việc
WORKDIR /app

# Sao chép file ứng dụng
COPY app.py .

# Thiết lập biến môi trường APP_ENV với giá trị mặc định
# Giá trị này sẽ được sử dụng nếu không được ghi đè lúc chạy container
ENV APP_ENV=development

# Lệnh để chạy script Python khi container khởi động
CMD [ "python", "./app.py" ]
