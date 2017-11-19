function [J, Gradient] = computeRegularizedCostAndGradient (D, Y, Hypothesis,lambda)
%UNTITLED Summary of this function goes here
%   Detailed explanation goes here

getSize = size(D);
Gradient=zeros(1,getSize(2));
J=0; 
eps=0.0001;
theta=0;
gradTheta=0;

for i=1:getSize(1)
    predictVal=predictValue(D(i,:),Hypothesis);
    if(predictVal == 0)
        J=J+(-Y(i)*log(predictVal+eps)-((1-Y(i))*log(1-predictVal)));  
    else if(predictVal==1)
        J=J+(-Y(i)*log(predictVal)-((1-Y(i))*log(1-(predictVal-eps))));
    else
        J=J+(-Y(i)*log(predictVal)-((1-Y(i))*log(1-predictVal)));
        end 
    end
    
    for j=1:getSize(2)
        error=predictVal-Y(i);
        Gradient(j)=Gradient(j)+(error*D(i,j));
    end
end



for j=2:getSize(2)
    theta= theta + Hypothesis(j)^2;
end

J=J/getSize(1) +((lambda/(2*getSize(1)))*theta);



for k=2:getSize(2)
    gradTheta= gradTheta + Hypothesis(k);
end
Gradient= (Gradient ./ getSize(1))+((lambda/getSize(1)))*gradTheta;


end





