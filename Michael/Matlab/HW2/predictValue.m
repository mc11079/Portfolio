function [prediction] = predictValue(Example, Hypothesis)
%Function multiplies Example matrix by Transposed Hypothesis matrix

value=Example*Hypothesis';
prediction= sigmoid(value);

end

