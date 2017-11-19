function [ send_matrix ] = multi( D,Binary )
%UNTITLED4 Summary of this function goes here
%   Detailed explanation goes here

send_matrix=zeros(4096,24);
for i=1:4096
    for j=1:24
       send_matrix(i,j)=Binary(i,:)*D(:,j); 
       send_matrix(i,j)=mod(send_matrix(i,j),2);
    end
end
end

