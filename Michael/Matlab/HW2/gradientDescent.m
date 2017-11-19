function [Costs, FinalHypothesis] = gradientDescent(filename, alpha, max_iter, threshold)
[D,Y]=loadData(filename);
Data=addOnesColumn(D);
%Initialize:
iter=0;
flag=true;
Hypothesis=[-10 1 -1];
while(flag)
iter=iter+1;

[compCost,gradient]=computeCostAndGradient(Data,Y,Hypothesis);
%Append cost to Costs array
Costs(iter)=compCost;

Hypothesis=updateHypothsis(Hypothesis,alpha,gradient);

if(iter >= 2 && (abs(Costs(iter-1)-Costs(iter))<=threshold))
    flag=false;
    formatSpec = 'Gradient descent terminating after %d iterations. Improvement was :  %d   below threshold (%f)';
    fprintf(formatSpec,iter,Costs(iter-1)-Costs(iter),threshold);
end

if(iter+1 > max_iter )
    flag=false;
    formatSpec = 'Gradient descent terminating after %d iterations (max_iter)';
    fprintf(formatSpec,max_iter);
end
end
FinalHypothesis=updateHypothsis(Hypothesis,alpha,gradient);
figure, plot(Costs);
plotDecisionBoundary(FinalHypothesis,Data,Y);
end

