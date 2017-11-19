function [ output_matrix ] = sigmoid ( z )
%UNTITLED3 Summary of this function goes here
%   Detailed explanation goes here**********
%sizeOfz = size(z);

e=exp(1);

output_matrix=zeros(size(z));

for i=1:size(output_matrix,1)
    for j=1:size(output_matrix,2)
    output_matrix(i,j)= (1/(1+e^(-z(i,j))));
    %output_matrix(i)=sum(i)+((Data(:,i))'*Errors);
    end
end

end

