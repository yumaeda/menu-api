# menu-api
Repository for AWS Lambda-based menu API

## Deployment
### Deploy Lambda
```bash
cd xxx_xxx && ./deploy.sh
```

&nbsp;

## Misc
### Create Lambda Function
```bash
aws lambda create-function \
    --function-name <FUNCTION_NAME> \
    --runtime python3.8 \
    --zip-file fileb://<ZIP_NAME> \
    --handler lambda_function.lambda_handler \
    --role arn:aws:iam::xxxxxxxxxxxx:role/lambda-vpc-role \
    --vpc-config SubnetIds=subnet-xxxxxxxxxxxxxxxxx,subnet-yyyyyyyyyyyyyyyyy,SecurityGroupIds=sg-xxxxxxxxxxxxxxxxx
```

&nbsp;

### Remove Lambda Function
```bash
aws lambda delete-function --function-name <FUNCTION_NAME>
```


