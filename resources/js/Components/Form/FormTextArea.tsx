import { ro } from 'date-fns/locale';
import React, { ChangeEventHandler } from 'react';

type Props = {
  name: string;
  onChange: ChangeEventHandler<HTMLTextAreaElement>;
  value?: string | number | readonly string[] | undefined;
  cols?: number;
  rows?: number;
};

const FormTextArea = ({
  name,
  value,
  onChange,
  cols = 20,
  rows = 10,
}: Props) => {
  return (
    <textarea
      className="bg-gray-50 border-gray-200 rounded-md focus:outline-none focus:border-blue-500 focus:ring-blue-500"
      name={name}
      onChange={onChange}
      value={value}
      cols={cols}
      rows={rows}
    ></textarea>
  );
};

export default FormTextArea;
