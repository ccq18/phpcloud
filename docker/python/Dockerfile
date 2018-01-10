FROM python:3.6-alpine
ADD $PWD/ /code
WORKDIR /code
RUN pip install redis flask
CMD ["python", "app.py"]