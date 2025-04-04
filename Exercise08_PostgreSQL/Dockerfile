FROM postgres:15

ENV POSTGRES_PASSWORD=postgres
ENV POSTGRES_USER=postgres
ENV POSTGRES_DB=postgresql

COPY init.sql /docker-entrypoint-initdb.d/

EXPOSE 5433