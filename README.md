# Three-Tier Web Application Deployment with ALB, Auto Scaling, and RDS

## Project Overview

This project demonstrates the deployment of a three-tier web application on AWS using Amazon VPC, Amazon EC2, Application Load Balancer, Auto Scaling Group, and Amazon RDS MySQL.

The application layer runs on EC2 instances in private subnets, while the database layer uses Amazon RDS MySQL in private subnets. An internet-facing Application Load Balancer distributes incoming traffic across healthy EC2 instances.

## Architecture

```text
                         Internet
                            |
                            v
                Application Load Balancer
                            |
                            v
                   Auto Scaling Group
                      /          \
                     /            \
                    v              v
              EC2 Instance 1  EC2 Instance 2
              Private Subnet  Private Subnet
                     \            /
                      \          /
                       v        v
                       Amazon RDS
                      MySQL Database
                      Private Subnet
AWS Services Used
Amazon VPC
Amazon EC2
Application Load Balancer
Auto Scaling Group
Amazon RDS MySQL
Amazon CloudWatch
AWS IAM
NAT Gateway
Internet Gateway
Security Groups
EC2 Instance Connect Endpoint
Network Architecture
VPC

CIDR:

10.0.0.0/16

Public Subnets
10.0.1.0/24 - Availability Zone 1
10.0.2.0/24 - Availability Zone 2
Private Application Subnets
10.0.11.0/24 - Availability Zone 1
10.0.12.0/24 - Availability Zone 2
Private Database Subnets
10.0.21.0/24 - Availability Zone 1
10.0.22.0/24 - Availability Zone 2
Application Flow
User sends an HTTP request to the Application Load Balancer.
The ALB forwards the request to a healthy EC2 instance.
Nginx and PHP-FPM process the application request.
The PHP application connects to Amazon RDS MySQL.
Registration data is stored in the RDS database.
Auto Scaling maintains the required EC2 capacity.
Amazon CloudWatch provides monitoring metrics.
Application

The application is a simple PHP-based student registration system.

Users can enter:

Name
Email

The submitted data is stored in a MySQL database hosted on Amazon RDS.

Security
RDS is configured without public access.
RDS port 3306 accepts traffic only from the EC2 security group.
EC2 HTTP traffic is allowed from the ALB security group.
SSH access is restricted to the administrator's IP.
Application instances are deployed in private subnets.
NAT Gateway provides outbound internet access for private application instances.
IAM is used for Systems Manager access.
Auto Scaling

The Auto Scaling Group is configured with:

Minimum instances: 2
Desired instances: 2
Maximum instances: 4
Target tracking CPU utilization: 50%

This allows the application layer to automatically adjust capacity based on CPU utilization.

Load Balancing

An internet-facing Application Load Balancer distributes incoming HTTP requests across healthy EC2 instances.

Health checks are configured to verify application availability.

Monitoring

Amazon CloudWatch is used to monitor:

EC2 CPU utilization
ALB request metrics
ALB target health
RDS CPU utilization
RDS database connections
RDS storage and memory metrics
Technologies
AWS
Linux
Nginx
PHP
MySQL
Amazon RDS
Amazon CloudWatch