function  [UpdatedHypothesis] = updateHypothsis(Hypothesis, alpha, Gradient)
%Function updates theta value after gradient calcualtion 
    for i=1:size(Hypothesis,2)
        UpdatedHypothesis(i)=Hypothesis(i)-(alpha*Gradient(i));
    end
end


