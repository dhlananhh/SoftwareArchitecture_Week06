import os

app_env = os.environ.get('APP_ENV', 'production')

print(f"Application environment: {app_env}")
