import React from 'react';

type Props = {
  htmlFor: string;
  label: string;
};

const FormLabel = ({ htmlFor, label }: Props) => {
  return (
    <label htmlFor={htmlFor} className="text-lg font-headings font-bold">
      {label}
    </label>
  );
};

export default FormLabel;
